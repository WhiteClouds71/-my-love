<?php
    //定义一个类    类是由 属性（变量） 和 方法（函数）组成
    class Cat {
        //颜色
        public $color = "white";                //成员属性(变量)

        //定义一个 行为 方法
        public function climbTree(){            //成员方法（函数）
            echo "在爬树";
        }

        public function catchMouse()
        {
            echo "抓老鼠";
        }
    }

    //将类实例化 得到一个对象
    $cat1 = new Cat();
    var_dump($cat1);echo '<hr>';


    $c = $cat1->color;           //访问成员变量
    var_dump($c);
    echo '<hr>';
    $cat1->climbTree();         // 访问成员方法（函数）
    echo '<hr>';
    $cat1->catchMouse();

