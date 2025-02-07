<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public function render()
    {
        return view('livewire.notification');
    }
    protected $listeners = ['remove'];
    public $modFor;
    public $paraValue;
    public $modalMessage;
    public $modalText;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
   
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertSuccess()
    {
        $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => $this->modalMessage, 
                'text' => $this->modalText,
            ]);
    }
     public function showSMSKey()
    {

        $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'info',  
                'message' => $this->paraValue, 
                'text' => "This is your SMS Key",
            ]);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',  
                'message' => 'Are you sure?', 
                'text' => 'If deleted, you will not be able to recover this file!'
            ]);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove()
    {
        if ($this->modFor=="smsai_unlink") {
            return redirect(route('sms.session.stop',['key'=>$this->paraValue]));
        }
    }
}
