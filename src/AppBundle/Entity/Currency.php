<?php
// src/AppBundle/Entity/TargetCurrency.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="currency_rates")
 */
class Currency
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
    private $base_cur_name;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set base_cur_name
     *
     * @param string $base_cur_name
     *
     * @return Currency
     */
    public function setBaseName($base_cur_name)
    {
        $this->base_cur_name = $base_cur_name;

        return $this;
    }

    /**
     * Get base_cur_name
     *
     * @return string
     */
    public function getBaseName()
    {
        return $this->base_cur_name;
    }


    /**
     * Set target_cur_name
     *
     * @param string $target_cur_name
     *
     * @return Currency
     */
    public function setTargetName($target_cur_name)
    {
        $this->target_cur_name = $target_cur_name;

        return $this;
    }

    /**
     * Get target_cur_name
     *
     * @return string
     */
    public function getTargetName()
    {
        return $this->target_cur_name;
    }



    /**
     * Set target_value
     *
     * @param string $target_value
     *
     * @return Currency
     */
    public function setTargetPrice($target_value)
    {
        $this->target_value = $target_value;

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
