<?php namespace Vonzimmerman\Displaycase\Components;

use Cms\Classes\ComponentBase;
use Vonzimmerman\DisplayCase\Models\Profile as Profiles;

class SocialNav extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SocialNav Component',
            'description' => 'Nifty looking nav'
        ];
    }

    public function defineProperties()
    {
        return [
           'profile' => [
             'title'             => 'key',
             'description'       => 'Select the profile whose links you want to display',
             'placeholder'       => 'Select option',
             'type'              => 'dropdown',
             'options' => $this->getKeys()
        ] 
        ];
    }
    public function getKeys() {
        $profileKeys = [];
        $profiles = Profiles::get();
        foreach ($profiles as $p) {
            $profileKeys[$p['profile_key']] = $p['profile_key'];
        }
        return $profileKeys;
    }
    public function getLinks()
    {
        return Profiles::with(['links', 'links.icon'])
            ->where('profile_key', $this->property('profile'))
            ->has('links')
            ->first()
            ->links()
            ->with(['icon'])
            ->get();
    }
    public function onRun()
    {
        //Solution for accessing relations through component
        //templates. 
        $links = $this->getLinks();
        $retLink = [];
        foreach($links as $l) {
            $temp = [];
            $temp[] = $l->icon()->first();
            $temp[] = $l;
            $retLink[] = $temp;
        }
        $this->page['links'] = $retLink;
        $this->page['email'] = Profiles::where('profile_key', $this->property('profile'))
            ->first()->email;

    }
}
