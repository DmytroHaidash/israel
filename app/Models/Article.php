<?php

namespace App\Models;

use App\Http\Resources\ImageResource;
use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Article extends Model implements HasMedia
{
    use SluggableTrait, HasMediaTrait;

    protected $fillable = [
        'slug',
        'published'
    ];
    protected $with = [
        'translates',
    ];

    /**
     * @return string
     */
    public function getPreviewImageAttribute()
    {
        $media = 'images/no-image.png';

        if ($this->hasMedia('article')) {
            $media = substr($this->getFirstMediaUrl('article', 'preview'), 1);
        }

        return asset($media);
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('article')
            ->registerMediaConversions(function (Media $media = null) {
                $this
                    ->addMediaConversion('thumb')
                    ->crop(Manipulations::CROP_CENTER, 100, 100)
                    ->width(100)
                    ->height(100);

                $this
                    ->addMediaConversion('preview')
                    ->crop(Manipulations::CROP_CENTER, 385, 193)
                    ->width(385)
                    ->height(193);
            });
    }


    public function getImagesListAttribute()
    {
        return ImageResource::collection($this->getMedia('uploads'));
    }
}
