<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
//Данные о билета
/**
 * @ORM\Entity
 * @ORM\Table(name="tickets")
 * @ORM\HasLifecycleCallbacks()
 */
class Tickets implements \JsonSerializable {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $place;
    /**
     * @ORM\Column(type="string", length=100)
     *
     */
    private $user_id;
    /**
     * @ORM\Column(type="string", length=100)
     *
     */
    private $plain_id;
    /**
     * @ORM\Column(type="string", length=100)
     *
     */
    private $payment_id;
    /**
     * @ORM\Column(type="string", length=100)
     *
     */
    private $booking_id;

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
    public function getPrice()
    {
        return $this->place;
    }
    /**
     * @param mixed $place
     */
    public function setPrice($place)
    {
        $this->place = $place;
    }
    /**
     * @return mixed
     */
    public function getBookingId()
    {
        return $this->booking_id;
    }
    /**
     * @param mixed $booking_id
     */
    public function setBookingId($id)
    {
        $this->booking_id = $id;
    }
    /**
     * @return mixed
     */
    public function getPaymentId()
    {
        return $this->payment_id;
    }
    /**
     * @param mixed $payment_id
     */
    public function setPaymentId($id)
    {
        $this->payment_id = $id;
    }
    /**
     * @return mixed
     */
    public function getPlainId()
    {
        return $this->plain_id;
    }
    /**
     * @param mixed $plain_id
     */
    public function setPlainId($id)
    {
        $this->plain_id = $id;
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
    public function getCreateDate(): ?\DateTime
    {
        return $this->create_date;
    }
    /**
     * @param \DateTime $create_date
     * @return Tickets
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
            "description" => $this->getDescription()
        ];
    }
}