<?php

namespace Modules\Page\Events;

use Modules\Media\Contracts\StoringMedia;
use Modules\Page\Entities\Category;

class CategoryWasCreated implements StoringMedia
{
    /**
     * @var array
     */
    public $data;
    /**
     * @var category
     */
    public $category;

    public function __construct(Category $category, array $data)
    {
        $this->data = $data;
        $this->category = $category;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->category;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}
