<?php
require_once "view/HistoryView.class.php"; // REQUIRE VIEW (FOR DISPLAYING)

require_once "model/persist/HistoryDAO.class.php"; // to show pet's detail

require_once "util/HistoryMessage.class.php"; // to show pet's detail

/**
 * Class that controls the user's requests sent to the pets-related section of the website.
 */
class HistoryController
{
    private $view;
    private $model;

    /**
     * Instantiate View and Model.
     */
    public function __construct()
    {
        $this->view = new HistoryView();
        $this->model = new HistoryDAO();
    }

    /**
     * This method is called by the Main Controller. It will process the $_POST or $_GET request sent by the user.
     */
    public function processRequest()
    {
        // CHECK GET AND POST
        $request = NULL;
        if (isset($_POST["action"])) $request = $_POST["action"]; // POST "action" PARAMETER EXISTS (SUBMIT BUTTON WAS CLICKED) --> SET $request TO ITS VALUE
        else if (isset($_GET["option"])) $request = $_GET["option"]; // URL "menu" PARAMETER EXISTS --> SET $request TO ITS VALUE (USER IS IN A SPECIFIC SUB-PAGE)

        switch ($request) {
            case "list_all":
                $this->listAll();
                break;

            default:
                // if (str_contains($request, "modify_pet_"))
                // {
                //     $id = explode('_', $request)[2];

                // }
                // else
                // {
                // URL PARAM "option" DOES NOT EXIST AND THE FORM SUBMIT BUTTON WAS NOT PRESSED --> DISPLAY VIEW (ONLY PET MENU)
                $this->view->display();
                // }
        }
    }

    /**
     * Display all owners in a table, using the view. The owners were retrieved using the model.
     */
    public function listAll()
    {
        $content = $this->model->listAll(); // gather data from DAO

        if (!empty($content)) $_SESSION["info"][]  = HistoryMessage::SELECT_SUCCESS;
        else               $_SESSION["error"][] = HistoryMessage::SELECT_ERROR;

        $this->view->display("view/form/HistoryList.php", $content); // display data
    }
}