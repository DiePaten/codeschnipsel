<?php
//////////////////////// SoundCloud-Player Parameter ///////////////////////////////////////////////////
/*
 Die ID eines Tracks kann man sich z.B. so holen indem man über den Download Button unter dem Player auf soundcloud.com mit der Maus fährt.
 
 ||| Beispiel Link: https://api.soundcloud.com/tracks/[TRACK-ID]/download?client_id=b45b1aa10f1ac2941910a7f0d10f8e28 |||
 
 Man braucht nur die 9-stellige Zahl die dort steht wo jetzt im Beispiel Link [TRACK-ID] steht siehe unten einzutragen!
 */
$track_id="103936820";    // ID des SoundCloud Tracks siehe oben!
$player_color="ca2828";   // Farbcode ohne die übliche # vor dem Code
$autoplay="false";        // true|false
$download="false";        // true|false
$sharing="false";         // true|false
$comments="false";        // true|false
$like="false";            // true|false

////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
	</head>
	<body>
		<iframe id="sc-widget" src="https://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/<?=$track_id ?>&amp;color=<?=$player_color ?>&amp;auto_play=<?=$autoplay ?>&amp;auto_advance=false&amp;buying=false&amp;liking=<?=$like ?>&amp;download=<?=$download ?>&amp;sharing=<?=$sharing ?>&amp;show_artwork=true&amp;show_comments=<?=$comments ?>&amp;show_playcount=false&amp;show_user=false&amp;start_track=0&amp;callback=true" width="100%" height="115" scrolling="no" frameborder="no"></iframe>
		<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
		<script type="text/javascript">
			( function() {
					var widgetIframe = document.getElementById('sc-widget'), widget = SC.Widget(widgetIframe);
					widget.bind(SC.Widget.Events.READY, function() {
						widget.bind(SC.Widget.Events.PLAY, function() {
							// get information about currently playing sound
							widget.getCurrentSound(function(currentSound) {
								console.log('sound ' + currentSound.get('') + 'began to play');
							});
						});
						// get current level of volume
						widget.getVolume(function(volume) {
							console.log('current volume value is ' + volume);
						});
						// set new volume level
						widget.setVolume(50);
						// get the value of the current position
					});
				}());
		</script>
		<input style="background-color: gray; border-radius: 3px; padding: 3px; border: 0px; cursor: pointer; font-family: Nasalization; font-color: white;" title="DOWNLOAD" onclick="location.href='https://api.soundcloud.com/tracks/<?=$track_id ?>/download?client_id=b45b1aa10f1ac2941910a7f0d10f8e28'" type="button" value="Download" sourceindex="1">
	</body>
</html>
