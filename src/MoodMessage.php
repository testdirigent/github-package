<?php

namespace TestDirigent\GithubPackage;

class MoodMessage
{
    // Property to hold the current hour
    private $hour;

    // Constructor to initialize the current hour
    public function __construct()
	{
        $this->hour = date('H');
    }

    // Function to generate a random face based on mood
    private function randomFace($mood)
	{
        $faces = [
            "happy" => [
                "(^_^) ",
                "(o^_^)o",
                "(°‿°)",
                "(* ^ ‿ ^*)"
            ],
            "angry" => [
                "ಠ_ಠ",
                "ヾ(⌐■_■)ノ",
                "¬_¬",
                "(╬ ಠ益ಠ)"
            ],
            "sleepy" => [
                "(¬_¬)",
                "(-_-)Zzz",
                "(≖_≖)",
                "(-_-)zzZ"
            ],
            "surprised" => [
                "(o_O)",
                "(@_@)",
                "ヽ(°□°)ﾉ",
                "(⊙_☉)"
            ]
        ];

        // Select a random face from the chosen mood
        return $faces[$mood][array_rand($faces[$mood])];
    }

    // Determine the mood based on the current time of day
    private function determineMood()
	{
        if ($this->hour >= 6 && $this->hour < 12) {
            return 'happy'; // Morning = Happy
        } elseif ($this->hour >= 12 && $this->hour < 18) {
            return 'surprised'; // Afternoon = Surprised
        } elseif ($this->hour >= 18 && $this->hour < 22) {
            return 'angry'; // Evening = Angry
        } else {
            return 'sleepy'; // Night = Sleepy
        }
    }

    // Output the wacky face with the appropriate mood
    public function show()
	{
        $mood = $this->determineMood();
        $timeOfDay = ($this->hour < 12) ? "Morning" : (($this->hour < 18) ? "Afternoon" : "Evening");
        
        // Output the message and face
        echo "<h1>Good {$timeOfDay}!</h1>";
        echo "<p>Today's mood is <b>{$mood}</b>:</p>";
        echo "<pre>" . $this->randomFace($mood) . "</pre>";
    }
}
