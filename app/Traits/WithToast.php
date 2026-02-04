<?php

namespace App\Traits;

trait WithToast
{
    public function toast($message, $type = 'success')
    {
        session()->flash('toast', [
            'message' => $message,
            'type' => $type
        ]);
    }

    public function toastSuccess($message)
    {
        $this->toast($message, 'success');
    }

    public function toastError($message)
    {
        $this->toast($message, 'error');
    }

    public function toastInfo($message)
    {
        $this->toast($message, 'info');
    }

    public function toastWarning($message)
    {
        $this->toast($message, 'warning');
    }
}
