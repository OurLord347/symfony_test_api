<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
//Данные о пассажире
/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\HasLifecycleCallbacks()
 */
class User implements \JsonSerializable {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=100)
     *
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $create_date;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * @return mixed
     */
    public function getCreateDate(): ?\DateTime
    {
        return $this->create_date;
    }
    /**
     * @param \DateTime $create_date
     * @return User
     */
    public function setCreateDate(\DateTime $create_date): self
    {
        $this->create_date = $create_date;
        return $this;
    }
    /**
     * @throws \Exception
     * @ORM\PrePersist()
     */
    public function beforeSave(){

        $this->create_date = new \DateTime('now', new \DateTimeZone('Africa/Casablanca'));
    }
    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            "name" => $this->getName(),
        ];
    }
}