<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // json 데이터를 
        // api로 보내주는 데이터를 한번 가공해서 보내줄 수 있음
        // Todo에 대한 Model을 반환할 때 TodoResource 활용해서 반환한다고 보면 됨
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            // strtotime -> string to time // 마감기한이 없으면 마감기한이 정해져 있지않다는 string 띄워주고 아니라면 deadline 띄워주기 
            'deadline' => ($this->deadline == null) ? "마감기한이 정해져 있지 않습니다." : date('Y-m-d', strtotime($this->deadline)),
            'isDone' => $this->id,
            'updated_at' => $this->updated_at->diffForHumans() . "전에 수정되었습니다.",
        ];
    }
}
