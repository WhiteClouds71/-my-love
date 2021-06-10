<?php
Class Yingxiong {
    public function __construct($name,$gexing,$sex,$zhiye)
    {
        echo "名字：".$name;echo "</br>";
        echo "个性：".$gexing;echo "</br>";
        echo "性别：".$sex;echo "</br>";
        echo "职业：".$zhiye;
    }
}
$yingxiong = new Yingxiong("孙尚香","一技能强化普攻配合二技能破甲打出高额伤害","女","发育路");echo '<hr>';
$yingxiong2 = new Yingxiong("李信","每次释放技能有强化普攻","男","对抗路");echo '<hr>';
$yingxiong3 = new Yingxiong("百里玄策","二技能钩住秒二三","男","打野");echo '<hr>';
