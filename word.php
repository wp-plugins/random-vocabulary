<?php

/*
Plugin Name: Random Vocabulary 
Plugin URI: https://github.com/rakshithvasudev/Random-Vocab
Description: This is a simple plugin,which displays random words to improve your vocabulary during developing your cool website,based on Hello dolly.
Author: Rakshith Vasudev
Version: 1.0.1
Author URI: https://github.com/rakshithvasudev
*/

function vocab_entry() {
	/** These are the words  */
	$words = "Abhor = hate.
Bigot = narrow-minded, prejudiced person.
Counterfeit	= fake.
Boorish = ill-mannered. 
Acrophobia = fear of heights. 
Debility = weakness.
Languid = tired.
Acuity = sharpness.
Obtuse = mentally dull.  
Torpid = inactive.
Defunct = no longer in existence.
Etymology = the study of word origins.
Hyperbole = grossly exaggerated speech .
Hypochondriac  = a person obsessed with health; having imaginary illnesses. 
Rigor = thoroughness. 
Affable = friendly.
Eulogy = praise.
Heresy = against orthodox opinion .
Abate = become less in amount or intensity.
Cacophonous = Harsh-sounding; without harmony or rhyme.
Loquacious = full of trivial conversation.
Meticulous = marked by precise accordance with details.
Commensurate = corresponding in size or degree or extent.
Admonish = take to task.
Adulation = strong admiration.
Bristle = to show irritation.
Brusque = blunt.
Esoteric = obscure and difficult to understand.
Officious = domineering.
Posthumous = after death.
Acuity = sharpness.
Officious = domineering.
Totter = walk unsteadily.
Bulwark = fortification.
Abysmal = very deep.
Cadge = get by begging.
Extemporize = speak without preparation or rehearsal.
Incumbents = occupiers of a job or position.
Lambaste = attack verbally.
Cloistered = isolated.
Disabuse = make someone aware of an error in thinking.
Lugubrious = sad.
Nonplussed = confused.
Gaucherie = awkwardness.
Mannered = stylized.
Syllogism = type of logical reasoning.
Acolyte = disciple.
Denigrate = decry.
Rebus = puzzle in which pictures give clues.
Faddish  = whimsical.
Misconstrue = put a wrong interpretation on something.
Shard = fragment of pottery.
Xenophobe = person afraid of foreigners.
Vulpine = like a fox.
Shard = fragment of pottery.
Hapless = unlucky.
Exacerbated = made worse.
Pedantic = over-insistent on matters of book-learning.
Armada = fleet of ships.
Dross = something worthless.
Expiate = atone.
Dilettantism = dabbling esp. in the arts.
Malevolent = having evil intentions.
Neophyte = new convert; tyro.
Panegyric = speech praising someone; laudatory words.
Apprehension = slight fear.
Skiff = small boat.
Fallible = capable of making mistakes.
Hallow = respect.
Facetious = not intended to be taken seriously.
Indecorous = unseemly.
Usury = lending money at high interest rates.
Atavism = reappearance of ancestral traits.
Gambit = opening move.
Mitigation = making less severe.
Alleviated = made less severe.
Fusillade = long burst of gunfire.
Platitude = unoriginal, obvious saying.
Lassitude = lack of energy.
Renege = go back on promise or retract statement.
Filibuster = delaying tactics.
Obligate = compulsory.
Propitiate = appease.
Duplicity = cunning.
Quixotic = impractically idealistic.
Stipple = cover with dots of paint etc.
Cant = insincere talk.
Impeding = hindering.
Pied = multicolored.
Commingle = mix.
Demur = object; hesitate to accept.
Veneer = surface coating.
Veracity = truthfulness.
Metaphorically = symbolically.
Peerless = without equal.
Diurnal = active in daytime.
Fortitude = bravery.
Puerile = childish. 
Peerless = without equal.
Docile = gentle and easily lead.
Pellucid = transparently clear.";

	// Here we split it into lines
	$words = explode( "\n", $words );

	// And then randomly choose a line
	return wptexturize( $words[ mt_rand( 0, count($words ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function call_words() {
	$chosen = vocab_entry();
	echo "<p id='words'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'call_words' );

// We need some CSS to position the paragraph
function words_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#words {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'words_css' );

?>