<?php
abstract class Enum
{
    private $scalar;

    public function __construct($value)
    {
        $ref = new ReflectionObject($this);
        $consts = $ref->getConstants();
        if (! in_array($value, $consts, true)) {
            throw new InvalidArgumentException;
        }

        $this->scalar = $value;
    }

    final public static function __callStatic($label, $args)
    {
        $class = get_called_class();
        $const = constant("$class::$label");
        return new $class($const);
    }

    //元の値を取り出すメソッド。
    //メソッド名は好みのものに変更どうぞ
    final public function valueOf()
    {
        return $this->scalar;
    }

    final public function __toString()
    {
        return (string)$this->scalar;
    }
}


final class Suit extends Enum
{
    const SPADE = 'spade';
    const HEART = 'heart';
    const CLUB = 'club';
    const DIAMOND = 'diamond';
    const SAMPLE = 1;
}

//インスタンス化
//$suit = new Suit(Suit::SPADE);
//$suit = new Suit(Suit::DIAMOND);
$suit = new Suit(Suit::SAMPLE);
echo $suit. PHP_EOL; //toString実装済みなので文字列キャスト可能
//var_dump($suit);

//echo $suit->valueOf(); //生の値を取り出す。intやfloat等の場合に。
var_dump($suit->valueOf());

// 適当な値を突っ込もうとすると、InvalidArgumentExceptionが発生して停止
//$suit = new Suit('uso800');



//__callStaticを定義してあるのでnewを使わずこんな感じでも書ける(PHP5.3以降)
//$suit = Suit::SPADE();
