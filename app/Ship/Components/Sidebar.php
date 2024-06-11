<?php

namespace App\Ship\Components;

use Livewire\Component;

class Sidebar extends Component
{
    public $privilegios;
    public $modulos;
    public function mount()
    {
        $user = auth()->user();
        $this->modulos = $user->roles()->where('guard_name', 'web')->get()->flatMap->privilegios->unique('id')->toArray();
        $this->privilegios = $this->buildTree($this->modulos);

    }
    public function render()
    {
        return view('ship::partials.sidebar');
    }

    private function buildTree(array $elements, $parentId = null)
    {
        $branch = [];

        foreach ($elements as &$element) {
            if ($element['parent_id'] === $parentId) {
                $children = $this->buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }

}