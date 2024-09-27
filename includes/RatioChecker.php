<?php

class RatioChecker {
    public function calculateRatio($html) {
        $totalLength = strlen($html);
        $textLength = strlen($this->extractText($html));
        
        if ($totalLength > 0) {
            return $textLength / $totalLength;
        }
        
        return 0;
    }
    
    public function extractText($html) {
        // Remove style and script elements
        $text = preg_replace('/<style[^>]*>.*?<\/style>/is', '', $html);
        $text = preg_replace('/<script[^>]*>.*?<\/script>/is', '', $text);
        
        // Remove HTML comments
        $text = preg_replace('/<!--.*?-->/s', '', $text);
        
        // Strip tags to get the text content
        $text = strip_tags($text);
        
        // Normalize whitespace: replace multiple spaces and newlines with a single space, then trim
        $text = preg_replace('/\s+/', ' ', $text);
        $text = trim($text); // Remove leading/trailing whitespace

        // Remove all spaces for accurate text length calculation
        $textWithoutSpaces = preg_replace('/\s/', '', $text); // Remove all spaces

        return $textWithoutSpaces; // Return the text without spaces
    }
}
