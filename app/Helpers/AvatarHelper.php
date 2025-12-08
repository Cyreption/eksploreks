<?php

// Author: Nashita Aulia (5026231054)

namespace App\Helpers;

class AvatarHelper
{
    /**
     * Generate SVG initial avatar based on username
     * 
     * @param string $username
     * @param string $fullName
     * @return string SVG data URL
     */
    public static function generateInitialAvatar($username, $fullName = null)
    {
        // Get initials
        if ($fullName) {
            $parts = explode(' ', trim($fullName));
            $initial = strtoupper(substr($parts[0], 0, 1));
            if (count($parts) > 1) {
                $initial .= strtoupper(substr($parts[count($parts) - 1], 0, 1));
            }
        } else {
            $initial = strtoupper(substr($username, 0, 1));
        }

        // Color palette based on username
        $colors = [
            '#FF6B6B', '#4ECDC4', '#45B7D1', '#FFA07A', '#98D8C8',
            '#6C5CE7', '#A29BFE', '#FD79A8', '#FDCB6E', '#6C7A89',
            '#74B9FF', '#00B894', '#FF7675', '#D63031', '#E84393',
        ];
        
        $colorIndex = ord($username[0]) % count($colors);
        $bgColor = $colors[$colorIndex];

        // SVG with initials
        $svg = sprintf(
            '<svg width="200" height="200" xmlns="http://www.w3.org/2000/svg">
                <rect width="200" height="200" fill="%s" rx="10"/>
                <text x="100" y="110" font-size="80" font-weight="bold" text-anchor="middle" fill="white" font-family="Arial, sans-serif">%s</text>
            </svg>',
            $bgColor,
            $initial
        );

        return 'data:image/svg+xml;base64,' . base64_encode($svg);
    }

    /**
     * Get avatar URL - use uploaded avatar if exists, otherwise generate initial
     * 
     * @param string|null $avatarUrl
     * @param string $username
     * @param string|null $fullName
     * @return string
     */
    public static function getAvatarUrl($avatarUrl, $username, $fullName = null)
    {
        if ($avatarUrl) {
            return $avatarUrl;
        }
        
        return self::generateInitialAvatar($username, $fullName);
    }
}
