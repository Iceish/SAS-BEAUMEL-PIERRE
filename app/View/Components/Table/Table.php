<?php

namespace App\View\Components\Table;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use function view;

class Table extends Component
{
    public array|Collection $content;
    public array $columns;
    public array $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array|Collection $content, string $columns, string $route)
    {
        $this->content = $content ?? [];
        $this->route = $this->formatRouteString($route);
        $this->columns = $this->formatColumnString($columns);
    }

    private function formatColumnString(string $columnsString): array
    {
        $columns = [];

        $columnsStringArr = Str::of($columnsString)->explode(" ");
        foreach ($columnsStringArr as $columnString){
            $columnArr = Str::of($columnString)->explode("|");
            $columnName = $columnArr[0];
            if($columnName !== ""){
                $column = [];
                $column["name"] = $columnName;
                $columnAttributeString = $columnArr[1] ?? $columnName;
                $columnAttributeArr = Str::of($columnAttributeString)->explode(":");
                $column["attributeName"] = $columnAttributeArr[0];
                $column["attributeNameF"] = $columnAttributeArr[1] ?? null;
                $columns[] = $column;
            }
        }
        return $columns;
    }

    private function formatRouteString(string $routeString)
    {
        $routeArr = Str::of($routeString)->explode(":");
        return [
            "route" => $routeArr[0],
            "parameters"=> $routeArr[1] ?? ""
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     */
    public function render(): Application|Factory|View
    {
        return view('components.table.table');
    }
}
