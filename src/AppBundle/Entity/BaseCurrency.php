<?php
// src/AppBundle/Entity/BaseCurrency.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="base_currency_rates")
 */
class BaseCurrency
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
     * @ORM\Column(type="integer", options={"default" : 1}))
     */
    private $base_value;



    /**
     * Get id
     *
     * @return integer
     */
    public function getBaseId()
    {
        return $this->id;
    }

    /**
     * Set base_cur_name
     *
     * @param string $base_cur_name
     *
     * @return BaseCurrency
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
     * Set base_value
     *
     * @param string $base_value
     *
     * @return BaseCurrency
     */
    public function setBasePrice($base_value)
    {
        $this->base_value = $base_value;

        return $this;
    }

    /**
     * Get base_value
     *
     * @return string
     */
    public function getBasePrice()
    {
        return $this->base_value;
    }
}
