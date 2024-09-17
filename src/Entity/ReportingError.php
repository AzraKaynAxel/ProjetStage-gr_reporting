<?php

namespace gr_reporting\Entity;

class ReportingError
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column
     */
    private ?int $id = null;

    /**
     * @ORM\OneToMany
     * @ORM\Column
     */
    private ?Order $id_order = null;

    /**
     * @ORM\Column(lenght: 9)
     */
    private ?string $reference = null;

    /**
     * @ORM\Column (type: Types::DATE_IMMUTABLE)
     */
    private ?\DateTimeImmutable $date_order = null;

    /**
     * @ORM\Column(lenght: 64)
     */
    private ?string $libelle_error = null;

    /**
     * @ORM\Column(lenght: 50)
     */
    private ?string $status_error = null;

    /**
     * @ORM\Column (type: Types::DATE_IMMUTABLE)
     */
    private ?\DateTimeImmutable $date_add = null;

    /**
     * @ORM\Column (type: Types::DATE_IMMUTABLE)
     */
    private ?\DateTimeImmutable $date_update = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Order|null
     */
    public function getIdOrder(): ?Order
    {
        return $this->id_order;
    }

    /**
     * @param Order|null $id_order
     */
    public function setIdOrder(?Order $id_order): void
    {
        $this->id_order = $id_order;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDateOrder(): ?\DateTimeImmutable
    {
        return $this->date_order;
    }

    /**
     * @param \DateTimeImmutable|null $date_order
     */
    public function setDateOrder(?\DateTimeImmutable $date_order): void
    {
        $this->date_order = $date_order;
    }

    /**
     * @return string|null
     */
    public function getLibelleError(): ?string
    {
        return $this->libelle_error;
    }

    /**
     * @param string|null $libelle_error
     */
    public function setLibelleError(?string $libelle_error): void
    {
        $this->libelle_error = $libelle_error;
    }

    /**
     * @return string|null
     */
    public function getStatusError(): ?string
    {
        return $this->status_error;
    }

    /**
     * @param string|null $status_error
     */
    public function setStatusError(?string $status_error): void
    {
        $this->status_error = $status_error;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDateAdd(): ?\DateTimeImmutable
    {
        return $this->date_add;
    }

    /**
     * @param \DateTimeImmutable|null $date_add
     */
    public function setDateAdd(?\DateTimeImmutable $date_add): void
    {
        $this->date_add = $date_add;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDateUpdate(): ?\DateTimeImmutable
    {
        return $this->date_update;
    }

    /**
     * @param \DateTimeImmutable|null $date_update
     */
    public function setDateUpdate(?\DateTimeImmutable $date_update): void
    {
        $this->date_update = $date_update;
    }


}
