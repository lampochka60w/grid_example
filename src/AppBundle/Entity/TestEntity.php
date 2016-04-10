<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestEntity
 *
 * @ORM\Table(name="test_entity")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TestEntityRepository")
 */
class TestEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="testfieldone", type="string", length=255, nullable=true)
     */
    private $testfieldone;

    /**
     * @var int
     *
     * @ORM\Column(name="testfieldtwo", type="integer", nullable=true)
     */
    private $testfieldtwo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set testfieldone
     *
     * @param string $testfieldone
     *
     * @return TestEntity
     */
    public function setTestfieldone($testfieldone)
    {
        $this->testfieldone = $testfieldone;

        return $this;
    }

    /**
     * Get testfieldone
     *
     * @return string
     */
    public function getTestfieldone()
    {
        return $this->testfieldone;
    }

    /**
     * Set testfieldtwo
     *
     * @param integer $testfieldtwo
     *
     * @return TestEntity
     */
    public function setTestfieldtwo($testfieldtwo)
    {
        $this->testfieldtwo = $testfieldtwo;

        return $this;
    }

    /**
     * Get testfieldtwo
     *
     * @return int
     */
    public function getTestfieldtwo()
    {
        return $this->testfieldtwo;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return TestEntity
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}

