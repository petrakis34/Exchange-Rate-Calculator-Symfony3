<?php
// src/AppBundle/Entity/TargetCurrency.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="target_currency_rates")
 */
class TargetCurrency
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $target_cur_name;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=4)
     */
    private $target_value;



    /**
     * Get id
     *
     * @return integer
     */
    public function getTargetId()
    {
        return $this->targetId;
    }

    /**
     * Set targetName
     *
     * @param string $target_cur_name
     *
     * @return TargetCurrency
     */
    public function setTargetName($target_cur_name)
    {
        $this->targetName = $target_cur_name;

        return $this;
    }

    /**
     * Get targetName
     *
     * @return string
     */
    public function getTargetName()
    {
        return $this->targetName;
    }



    /**
     * Set target_value
     *
     * @param string $target_value
     *
     * @return TargetCurrency
     */
    public function setTargetPrice($target_value)
    {
        $this->targetPrice = $target_value;

        return $this;
    }

    /**
     * Get target_value
     *
     * @return string
     */
    public function getTargetPrice()
    {
        return $this->target_value;
    }
}
