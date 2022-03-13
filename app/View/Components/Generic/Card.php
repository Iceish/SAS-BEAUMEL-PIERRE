<?php

namespace App\View\Components\Generic;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use JetBrains\PhpStorm\ArrayShape;
use function dd;

class Card extends Component
{
    public mixed $content;
    public array $show;
    public array $route;
    public string $perm;
    public bool $crud;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(mixed $content, string $show, string $route, string $crud='true')
    {
        $this->content = $content;
        $this->crud = $crud === 'true';
        $this->show = $this->formatShowString($show);
        $this->route = $this->formatRouteString($route);
        $this->perm = substr(strstr($this->route['route'], '.'),1);
    }

    /**
     * @param string $showStrings
     * @return array
     */
    private function formatShowString(string $showStrings): array
    {
        $shows = [];

        $showStringArr = explode(",",$showStrings);
        foreach ($showStringArr as $showString){
            $showArr = explode("|",$showString);
            $showName = $showArr[0];
            if($showName !== ""){
                $show = [];
                $show["name"] = str_replace('_',' ',$showName);
                $showAttributeString = $showArr[1] ?? $showName;
                $showAttributeArr = explode(":",$showAttributeString);
                $show["attributeName"] = $showAttributeArr[0];
                $show["attributeNameF"] = $showAttributeArr[1] ?? null;
                $shows[] = $show;
            }
        }
        return $shows;
    }

    /**
     * @param string $routeString
     * @return array
     */
    #[ArrayShape(["route" => "string", "parameters" => "string"])]
    private function formatRouteString(string $routeString): array
    {
        $routeArr = explode(":",$routeString);
        return [
            "route" => $routeArr[0],
            "parameters"=> $routeArr[1] ?? ""
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render(): View|string|\Closure
    {
        return view('components.generic.card');
    }
}
