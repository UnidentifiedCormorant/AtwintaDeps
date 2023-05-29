<?php

namespace App\Domain\DTO;

use App\Domain\Enum\Type;
use Atwinta\DTO\DTO;

class FindWorkerData extends DTO
{
    public function __construct(
        public ?string $query = null,
        public ?int $department_id = null,
        public ?int $position_id = null,
    )
    {
    }
}
