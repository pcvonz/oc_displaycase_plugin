<?php namespace Vonzimmerman\DisplayCase\Components;

use Cms\Classes\ComponentBase;
use Vonzimmerman\DisplayCase\Models\Profile as Profiles;

class Profile extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Profile Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'profile' => [
                'title' => 'Display a profile',
                'description' => 'Profile description',
                'type' => 'dropdown',
                'default' => '[Type profile key]',
                'placeholder' => 'Select profile to display',
                'options' => $this->getProfiles()
            ],
        ];
    }
    public function getProfiles() {
        $profileKeys = [];
        $profiles = Profiles::get();
        foreach ($profiles as $p) {
            $profileKeys[$p['profile_key']] = $p['profile_key'];
        }
        return $profileKeys;
    }
    public function profile() {
        return Profiles::with(['profile_image', 'links'])
            ->where('profile_key', $this->property('profile'))
            ->has('links')
            ->first();
    }
    public function onRun()
    {
        $this->page['profile'] = $this->profile();
    }
}
