<?php

date_default_timezone_set('Asia/Tokyo');

class SingletonSample {
    private $id;

    private static $instance;

    private function __construct()
    {
       $this->id = md5(date('r') . mt_rand());
    }


    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new SingletonSample();
            echo 'a SingletonSample instance was created!';
        }

        return self::$instance;
    }

    public function getId() {
        return $this->id;
    }

    public final function __clone() {
        throw new RuntimeException('Clone is not allowed against ' . get_class($this));
    }
}

$instance1 = SingletonSample::getInstance();
sleep(1);
$instance2 = SingletonSample::getInstance();

echo PHP_EOL;
echo 'instance ID : ' . $instance1->getId();
echo PHP_EOL;
echo 'instance1->getID() === instance2->getID() : ' . ($instance1->getId() === $instance2->getId() ? 'true' : 'false');
echo PHP_EOL;

echo 'instance1 === instance2 : ' . ($instance1 === $instance2 ? 'true' : 'false');
