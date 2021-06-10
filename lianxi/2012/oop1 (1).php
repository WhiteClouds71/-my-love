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
        }

        //定义一个 行为 方法
        public function climbTree(){            //成员方法（函数）
            echo "在爬树";
        }

        public function catchMouse()
        {
            echo "抓老鼠";
        }

        public function test()
        {
            //在类的内部
            $this->sleep1();
        }


        protected function sleep1(){
            echo $this->color;
        }

        private function eat(){
            echo "私有方法eat";
        }
    }

    //将类实例化 得到一个对象
    $cat1 = new Cat("大橘猫","Male","5kg");
    $cat2 = new Cat("小橘猫","Female","3kg");
    var_dump($cat1);echo '<hr>';

    // 使用 对象操作符  ->  访问对象的属性
    $c = $cat1->color;           //访问成员变量
    var_dump($c);
    echo '<hr>';
    $cat1->climbTree();         // 访问成员方法（函数）
    echo '<hr>';
    $cat1->catchMouse();

    echo '<hr>';
    echo "调用test方法：";
    $cat1->test();
   // $cat1->sleep1();

