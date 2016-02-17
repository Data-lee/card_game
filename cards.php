<?php

/** 
* Create a standard 52 deck of cards
* @return array
*/
function getDeck() {
	$deck = [];
	$suits = ['D', 'C', 'H', 'S'];
	$ranks = array_merge(['A'], range(2, 10), ['J', 'Q', 'K']);
	foreach ($suits as $suit) {
		foreach ($ranks as $rank) {
			$deck[] = $rank . $suit;
		}
	}
	return $deck;
}

/** 
* Shuffles a deck of cards.
* @param array $deck
* @return array $deck randomized deck of cards
*/
function shuffleDeck(&$deck) {
	shuffle($deck);
}

/**
* Deals a hand of cards to each player
* @param array $players players' names
* @param int $numCards number of cards in each players hands
* @param array $deck shuffled deck of cards array 
* @return array $playersHands
* @return array $deck
*/
function deal($players, $numCards, &$deck) {
	// convert players from values to keys
	$playersHands = array_flip($players);
	// set each player key to an empty array
	foreach ($players as $player) {
		$playersHands[$player] = [];
	}
	// deal the cards
	$count = $numCards - 1;
	foreach (range(0, $count) as $i) {
		foreach ($players as $player) {
			$currentCard = array_shift($deck);
			$playersHands[$player][$i] = $currentCard;	
		}
	}
	
	return $playersHands;
	return $deck;
}


// testing variables
$deck = getDeck();
shuffleDeck($deck);

$players = [
	'Natalia',
	'Hubert',
	'Jeborah',
	'Baskets'
];
$numCards = 5;

$firstHand = deal($players, $numCards, $deck);
print_r($deck);
print_r($firstHand);


?>
