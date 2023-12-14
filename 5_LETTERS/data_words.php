<?php
//I added some words made of 5 letters I'll use for the game, but i'm still wondering if I should use an API word
$data = [
    "apple", "beach", "chair", "dance", "earth",
    "faith", "glass", "house", "image", "jolly",
    "knife", "laugh", "music", "never", "olive",
    "peace", "quick", "rainy", "shiny", "table",
    "under", "visit", "water", "xerox", "yacht",
    "zebra", "alarm", "brave", "cloud", "dance",
    "eagle", "flirt", "grace", "happy", "ideal",
    "joker", "karma", "lemon", "movie", "nerve",
    "optic", "quiet", "radio", "sleep","unity", 
    "vision", "watch", "youth","abide", "blend", 
    "candy", "decal", "elite", "ivory", "joint",
    "flame", "globe", "haste", "novel", "oasis",
    "knack", "lunar", "mirth", "scent", "tramp",
    "plumb", "quilt", "rider", "zesty", "ultra",
    "vivid", "wager", 
];

// In order to use with JS
echo json_encode($data);
