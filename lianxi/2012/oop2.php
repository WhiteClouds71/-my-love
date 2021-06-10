<?php
    //定义一个类    类是由 属性（变量） 和 方法（函数）组成
    class Cat {
        //颜色
        public $color = "white";                //成员属性(变量)
        protected $name = "猫";
        private $sex = "Male";
        private $weight;


        //构造函数
        public function __construct($name,$sex,$weight){
            echo "name: ". $name;echo '</br>';
            echo "sex: ". $sex;echo '</br>';
            echo "weight: ". $weight;echo '</br>';
            $this->weight = $weight;            // 给属性赋值。
        }


        public function showWeight()
        {
            echo "重量： ". $this->weight;
        }



    }

    $cat1 = new Cat("大橘猫","Male","5kg");echo '</br>';
    $cat1->showWeight();
    echo '<hr>';
    $cat2 = new Cat("小橘猫","Female","3kg");echo '</br>';
    $cat2->showWeight();


