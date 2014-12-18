/*!
 * jQuery++ - 1.0.1
 * http://jquerypp.com
 * Copyright (c) 2014 Bitovi
 * Tue, 16 Dec 2014 23:23:18 GMT
 * Licensed MIT
 * Download from: http://bitbuilder.herokuapp.com/jquerypp.custom.js?plugins=jquerypp%2Fevent%2Fpause
 */
(function($) {

    // ## jquerypp/event/default/default.js
    var __m3 = (function($) {

        $.fn.triggerAsync = function(type, data, success, prevented) {
            if (typeof data == 'function') {
                prevented = success;
                success = data;
                data = undefined;
            }

            if (this.length) {
                var el = this;
                // Trigger the event with the success callback as the success handler
                // when triggerAsync called within another triggerAsync,it's the same tick time so we should use timeout
                // http://javascriptweblog.wordpress.com/2010/06/28/understanding-javascript-timers/
                setTimeout(function() {
                    el.trigger({
                            type: type,
                            _success: success,
                            _prevented: prevented
                        }, data);
                }, 0);

            } else {
                // If we have no elements call the success callback right away
                if (success)
                    success.call(this);
            }
            return this;
        }


        //cache default types for performance
        var types = {}, rnamespaces = /\.(.*)$/,
            $event = $.event;

        $event.special["default"] = {
            add: function(handleObj) {
                //save the type
                types[handleObj.namespace.replace(rnamespaces, "")] = true;
            },
            setup: function() {
                return true
            }
        }

        // overwrite trigger to allow default types
        var oldTrigger = $event.trigger;

        $event.trigger = function defaultTriggerer(event, data, elem, onlyHandlers) {

            // Event object or event type
            var type = event.type || event,
                // Caller can pass in an Event, Object, or just an event type string
                event = typeof event === "object" ?
                // jQuery.Event object
                event[$.expando] ? event :
                // Object literal
                new $.Event(type, event) :
                // Just the event type (string)
                new $.Event(type),
                res = oldTrigger.call($.event, event, data, elem, onlyHandlers),
                paused = event.isPaused && event.isPaused();

            if (!onlyHandlers && !event.isDefaultPrevented() && event.type.indexOf("default") !== 0) {
                // Trigger the default. event
                oldTrigger("default." + event.type, data, elem)
                if (event._success) {
                    event._success(event)
                }
            }

            if (!onlyHandlers && event.isDefaultPrevented() && event.type.indexOf("default") !== 0 && !paused) {
                if (event._prevented) {
                    event._prevented(event);
                }
            }

            // code for paused
            if (paused) {
                // set back original stuff
                event.isDefaultPrevented =
                    event.pausedState.isDefaultPrevented;
                event.isPropagationStopped =
                    event.pausedState.isPropagationStopped;
            }
            return res;
        };

        return $;
    })($);

    // ## jquerypp/event/pause/pause.js
    var __m1 = (function($) {

        var current,
            rnamespaces = /\.(.*)$/,
            returnFalse = function() {
                return false
            },
            returnTrue = function() {
                return true
            };

        $.Event.prototype.isPaused = returnFalse

        $.Event.prototype.pause = function() {
            // stop the event from continuing temporarily
            // keep the current state of the event ...
            this.pausedState = {
                isDefaultPrevented: this.isDefaultPrevented() ? returnTrue : returnFalse,
                isPropagationStopped: this.isPropagationStopped() ? returnTrue : returnFalse
            };

            this.stopImmediatePropagation();
            this.preventDefault();
            this.isPaused = returnTrue;
        };

        $.Event.prototype.resume = function() {
            // temporarily remove all event handlers of this type 
            var handleObj = this.handleObj,
                currentTarget = this.currentTarget;
            // temporarily overwrite special handle
            var origType = $.event.special[handleObj.origType],
                origHandle = origType && origType.handle;

            if (!origType) {
                $.event.special[handleObj.origType] = {};
            }
            $.event.special[handleObj.origType].handle = function(ev) {
                // remove this once we have passed the handleObj
                if (ev.handleObj === handleObj && ev.currentTarget === currentTarget) {
                    if (!origType) {
                        delete $.event.special[handleObj.origType];
                    } else {
                        $.event.special[handleObj.origType].handle = origHandle;
                    }
                }
            }
            delete this.pausedState;
            // reset stuff
            this.isPaused = this.isImmediatePropagationStopped = returnFalse;

            if (!this.isPropagationStopped()) {
                // fire the event again, no events will get fired until
                // same currentTarget / handler
                $.event.trigger(this, [], this.target);
            }

        };

        return $;
    })($, __m3);
})(jQuery);