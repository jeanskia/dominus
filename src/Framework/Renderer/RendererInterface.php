<?php
namespace Framework\Renderer;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 */
interface RendererInterface
{
    
    /**
     *rajoute un chemin pour charger les vues
     *
     * @param string $namespace
     * @param string $path
     */
    public function addPath(string $namespace, string $path = null):void;
    
    /**
     * rend une vue le chemin peut être précisè avec des namespace rajouté via le addPath()
     *
     * $this->render('@blog/view')
     * $this->render(view)
     * @param string $view
     * @param array $params
     * @return string
     */
    public function render(string $view, array $params = []): string;
    
    /**
     * permet de rajouter des variables globales à toute les vues
     * @param string $key
     * @param mixed $value
     */
    public function addGlobal(string $key, $value):void;
}
