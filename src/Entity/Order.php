<?php

namespace gr_reporting\Entity;

/**
 * @ORM\Entity(repositoryClass: OrderRepository::class)
 * @ORM\Entity (readOnly=true)
 * @ORM\Table(name="ps_orders")
 */

class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name='id_order")
     * @ORM\Column   
     */
    private ?int $idOrder = null;

    /**
     * @ORM\Column(name="reference", length: 9)
     * @ORM\Column(length: 9)
     */
    private ?string $reference = null;

    /**
     * @ORM\Column
     */
    private ?int $currentStatus = null;

    /**
     * @ORM\Column(name="date_add")
     * @ORM\Column
     */
    private ?\DateTimeImmutable $dateOrder = null;

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function getIdOrder(): ?int
    {
        return $this->idOrder;
    }

    public function getCurrentStatus(): ?int
    {
        return $this->currentStatus;
    }

    public function getDateOrder(): ?\DateTimeImmutable
    {
        return $this->dateOrder;
    }

}