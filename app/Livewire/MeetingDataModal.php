<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VideoHistory;
use App\Models\GroupReport;

class MeetingDataModal extends Component
{
    public $isOpen = false;
    public $meetingId;
    public $type;
    public $data;

    public function mount($meetingId)
    {

        $this->meetingId = $meetingId;
        // Adjust the relationship or query as needed
    }
    public function showData($meeting)
    {

        $this->meetingId = $meeting;


    }
    public function openModal($meeting,$type)
{
    $this->meetingId = $meeting;

        $data = GroupReport::find($meeting);

        $dataArray=['App name'=>$data->app_name,'Lesson'=>$data->lesson,'Project link'=>$data->project_link,'Note'=>$data->report,'Link'=>$data->link,'About'=>$data->about,];


   $this->dispatch('openPagamentoLongModal', dataGet: $dataArray);
}
public function closeModal()
{
   $this->dispatch('closePagamentoLongModal');
}

    public function render()
    {
        return view('livewire.meeting-data-modal');
    }

}
