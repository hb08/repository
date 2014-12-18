<?php

$vids = array(
	array("id"=>"bubbles", "title"=>"Arboreal Bubble", "source"=>"<a href='http://www.beachfrontbroll.com/2014/06/FloatingSoapBubbleStockFootage.html'>Beach Ront B-Roll</a>", "desc"=> "<p>Hope is like the sun, which, as we journey toward it, casts the shadow of our burden behind us.
<span>Samuel Smiles</span></p><p>In the midst of a sunlit forest, bubbles bob lightly in the background. A single bubble drifts into and out of focus, while in the background a soft melody dreamily weaves along.</p>
<p><span>Available</span> in MP4, WAV, OGV, and WEBM video formats, as well as MP3 and WAV audio formats.</p><p><span>Duration:</span> 60 seconds</p>"),
	array("id"=>"water", "title"=>"Eternal Waters", "source"=>"<a href='http://www.beachfrontbroll.com/2014/09/freeshorelinestockfootageclip.html'>Beach Ront B-Roll</a>", "desc"=> "<p>Let us follow our destiny, ebb and flow. Whatever may happen, we master fortune by accepting it.
	<span>Virgil</span></p><p>The gentle stream running over a stony surface is mirrored by the soft, almost sussurating sounds of the piano and vaguely angelic singing.  A sense of well-being descends upon the listener as they continue to stare into the ripples of the shallows.</p><p><span>Available</span> in MP4, WAV, OGV, and WEBM video formats, as well as MP3 and WAV audio formats.</p><p><span>Duration:</span> 60 seconds</p>"),
	array("id"=>"fish", "title"=>"Dreams of Ichthys", "source"=>"<a href='http://vimeo.com/groups/freehd/videos/22777917'>Phil Fried</a>", "desc"=> "<p>Adapt yourself to the life you have been given; and truly love the people with whom destiny has surrounded you.
	<span>Marcus Aurelius</span></p><p>An underwater scene, much like a fishtank, that features a number of small, darting fish.  Colored a brilliant blue and red, they move steadily in and out through the underwater greenery in time with the soaring synths and poignant piano keys, ending abruptly as the piscine travelers disappear along with the music, as elusive as they were to start.</p><p><span>Available</span> in MP4, WAV, OGV, and WEBM video formats, as well as MP3 and WAV audio formats.</p><p><span>Duration:</span> 60 seconds</p>"),
	array("id"=>"flowers", "title"=>"Tranquil Meadows", "source"=>"<a href='http://vimeo.com/groups/freehd/videos/23446294'>Phil Fried</a>", "desc"=> "<p>The tissue of life to be we weave with colors all our own,
And in the field of destiny we reap as we have sown.
<span>John Greenleaf Whittier</span></p><p>A reflective series of strings and tinkling synths seems to lend a feeling of breeziness to this picture of daffodils rocking back and forth, gently swaying in a light breeze.  The sounds that come in over the continually shifting visuals have a light and fey sensation to them, making it airer than some of the other selections.<p><span>Available</span> in MP4, WAV, OGV, and WEBM video formats, as well as MP3 and WAV audio formats.</p><p><span>Duration:</span> 60 seconds</p>"),
	array("id"=>"stars", "title"=>"Gazing Upwards", "source"=>"<a href='http://www.beachfrontbroll.com/2014/04/starrynightfreetimelapse.html'>Beach Ront B-Roll</a>", "desc"=> "<p>	No star is lost once we have seen,
	We always may be what we might have been.
	<span>Adelaide Proctor</span></p><p>A sense of descent seems to grip one as their viewpoint descends from stars higher above to those occupying the treetops in the distance.  Echoed in the sweeping drum and synth piano score, the scene is an inspiring autumnal piece that gives pause and conveys a definite set of sense perceptions.</p><p><span>Available</span> in MP4, WAV, OGV, and WEBM video formats, as well as MP3 and WAV audio formats.</p><p><span>Duration:</span> 60 seconds</p>"),
	array("id"=>"clouds", "title"=>"Clouded Heights", "source"=>"<a href='http://www.openfootage.net/?p=8914'>OpenFootage</a>", "desc"=> "
<p>Happiness is not a matter of events, it depends upon the tides of the mind.
<span>Alice Meynell</span></p><p>A tranquil transition into a cloud-wreathed mountain view, the skies gradually darkening even as the song and atmospheric conditions continually shift and transform in a soothing and all-encompassing wash of light instrumentals, precise and sweeping strings, and a shifting series of forms that continues to stir the imagination even after the video has commenced.</p><p><span>Available</span> in MP4, WAV, OGV, and WEBM video formats, as well as MP3 and WAV audio formats.</p><p><span>Duration:</span> 60 seconds</p>")
);
	
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>A Moment's Peace</title>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/jquerypp.custom.js"></script>
</head>
<body>
	<div class="wrapper">
		<header>
			<h1>Sixty Second Serenity</h1>
			<h2>Minute long videos to help you relax.</h2>
		</header>
		<article>
			<h3>“Your calm mind is the ultimate weapon against your challenges. So relax.”<span>Bryant McGill</span></h3>
		</article>
		<article>
			<?php
			foreach($vids as $array){
				$v = $array;
				echo "<figure>
						<a href='#' id='{$v['id']}' class='toggles'> {$v['title']} </a>
						<figcaption>
						<p>Source: <span>{$v['source']}</span></p>
						<h1>{$v['title']}</h1>
						{$v['desc']}
						<figcaption>
					</figure>";				
			}
			?>
		</article>
		<footer>
			<p>Created by Harmony for RMO</p>
			<p>All Audio from <a href="http://westarmusic.sourceaudio.com/#!explorer">WestarMusic</a>.</p>
		</footer>
	</div>
	
	<!-- Video up -->
	<div class="hidden" id="vidscreen">
		
		<?php
			$vidLoc = "media/video/";
			foreach($vids as $array){
				$v = $array;
				echo "
				<div class='vid hidden' id='" . $v['id'] . "' >
					<a href='#' class='close'>Back</a>
					<video controls preload='auto' id='" . $v['id'] . "'>
						<source src='". $vidLoc . $v['id'] . ".webm' type='video/webm'>
						<source src='". $vidLoc . $v['id'] . ".ogg' type='video/ogg'>
						<source src='". $vidLoc . $v['id'] . ".mp4' type='video/mp4'>
						I'm sorry, your browser doesn't support video.
					</video>
					<div class='descrip'>
						<h1>" . $v['title'] . "</h1>
						" .  $v['desc']  . $v['source'] . "
					</div>
					<div class='downloads'>
						<p>Downloads</p>
						<p>Video:</p>
							<a href='media/video/" . $v['id'] . ".mp4' download='" . $v['title'] . " MP4'>{$v['id']}.mp4 | MP4  | 60s | 1920x1080 | H.264, AAC</a>
							<a href='media/video/" . $v['id'] . ".mov' download='" . $v['title'] . " MOV'>{$v['id']}.mov | MOV  | 60s | 1920x1080 | H.264, AAC</a>
							<a href='media/video/" . $v['id'] . ".ogv' download='" . $v['title'] . " OGV'>{$v['id']}.ogv | OGV  | 60s | 1080x720 | Theora/Vorbis </a>
							<a href='media/video/" . $v['id'] . ".webm' download='" . $v['title'] . "WebM'>{$v['id']}.webm | WebM | 60s | 1080x720 | VP8 Video Codec </a>
							<object type='application/x-shockwave-flash' data='player.swf' class='hidden'> 
								<param name='allowfullscreen' value='true'> 
									<param name='allowscriptaccess' value='always'> 
									<param name='flashvars' value='file=" . $vidLoc . $v['id'] . ".mp4'> 
									<!--[if IE]>
										<param name='movie' value='player.swf'>
									<![endif]--> 
									<p>Your browser can’t play HTML5 video.</p> 
							</object>
						<p>Audio:</p>
							<a href='media/video/" . $v['id'] . ".mp3' download='" . $v['title'] . " MP3'>{$v['id']}.mp3 | MP3  | 60s </a>
							<a href='media/video/" . $v['id'] . ".' download='" . $v['title'] . " WAV'>{$v['id']}.wav | WAV  | 60s </a>
					</div>
				</div>
					";
			}
		?>
	</div>
    <script src="js/script.js"></script>
</body>
</html>


