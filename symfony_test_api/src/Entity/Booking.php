<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
//Данные о бронирвоании кто, когда...
/**
 * @ORM\Entity
 * @ORM\Table(name="booking")
 * @ORM\HasLifecycleCallbacks()
 */
class Booking implements \JsonSerializable {
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
    private $user_id;
    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $canceled = 0;

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
    public function getUserId()
    {
        return $this->user_id;
    }
    /**
     * @param mixed $user_id
     */
    public function setUserId($id)
    {
        $this->user_id = $id;
    }
    /**
     * @return mixed
     */
    public function getCanceled()
    {
        return $this->canceled;
    }
    /**
     * @param mixed $canceled
     */
    public function setCanceled($canceled)
    {
        $this->canceled = $canceled;
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
     * @return Booking
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
            "user_id" => $this->getUserId()
        ];
    }
}