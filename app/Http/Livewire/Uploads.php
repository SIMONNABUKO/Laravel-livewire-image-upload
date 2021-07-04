<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use App\Models\Upload;

use Livewire\Component;

class Uploads extends Component
{
    use WithFileUploads;

    public $image;
    public $uploads;
    public $message;
    public $title;
    public $desc;

    public function render()
    {
        $this->uploads = Upload::all();
        return view('livewire.uploads');
    }

    public function upload()
    {
        $validated = $this->validate([
           'title'=>'required',
           'image'=>'required|file',
           'desc'=>'required'

       ]);
        $uploadedImage = $this->image->store('public/uploads');
        $upload = new Upload;
        $upload->title = $this->title;
        $upload->image=$uploadedImage;
        $upload->desc = $this->desc;
        $upload->save();
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->title ='';
        $this->desc ='';
        $this->image ='';
        $this->message = "Image uploaded successfully";
    }
}
