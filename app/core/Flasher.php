<?php

class Flasher {
    public static function setFlash($message, $action, $type) {
        $_SESSION['flash'] = [
            'message' => $message,
            'action' => $action,
            'type' => $type
        ];
    }

    public static function getFlash() {
        if (isset($_SESSION['flash'])) {
            echo '
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div class="toast bg-' . $_SESSION['flash']['type'] . '" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                    <div class="toast-header">
                        <strong class="me-auto">Pemberitahuan</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-white">
                        Data Sekolah ' . $_SESSION['flash']['message'] . '' . $_SESSION['flash']['action'] . '
                    </div>
                </div>
            </div>
            ';
            unset($_SESSION['flash']);
        }
    }
}
