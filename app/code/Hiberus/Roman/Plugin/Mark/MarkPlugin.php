<?php

namespace Hiberus\Roman\Plugin\Mark;
use \Hiberus\Roman\Model\Roman;

class MarkPlugin{

    public function afterGetMark(Roman $subject, $result)
    {
        if ($subject->getData('mark') < 5.0) {
            $subject->setMark(4.9);
            $result = $subject->getData('mark');
        }
        return $result;
    }
}
