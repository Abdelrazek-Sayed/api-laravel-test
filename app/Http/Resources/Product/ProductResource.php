<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'stock' => $this->stock == 0 ? " No Stock Found" : $this->stock,

            'Price' => $this->price,
            'discount' => round(100 * (1 - (($this->price - $this->discount) / ($this->price)))) . " % ",
            'TotalPrice' => $this->price -  $this->discount ,

            'reviews' => route('product', $this->id),
            'rating' => $this->reviews->count() > 0 ?
                round($this->reviews->sum('star') / $this->reviews->count())
                : ' No Rating',

            'details' => $this->details,
        ];
    }
}
