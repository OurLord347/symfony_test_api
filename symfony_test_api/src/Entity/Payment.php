<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
//Данные о опалте кто, когда, сколько...
/**
 * @ORM\Entity
 * @ORM\Table(name="payment")
 * @ORM\HasLifecycleCallbacks()
 */
class Payment implements \JsonSerializable {
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
    private $play_id;
    /**
     * @ORM\Column(type="string", length=100)
     *
     */
    private $user_id;
    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $returned = 0;
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
    public function getPayId()
    {
        return $this->play_id;
    }
    /**
     * @param mixed $play_id
     */
    public function setPayId($id)
    {
        $this->play_id = $id;
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
    public function getReturned()
    {
        return $this->returned;
    }
    /**
     * @param mixed $returned
     */
    public function setReturned($returned)
    {
        $this->returned = $returned;
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
     * @return Payment
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
            "play_id" => $this->getPayId(),
            "user_id" => $this->getUserId()
        ];
    }
}