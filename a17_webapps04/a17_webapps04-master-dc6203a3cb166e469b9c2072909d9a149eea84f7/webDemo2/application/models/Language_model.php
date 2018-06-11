 <?php

/*
 * This model uses the language files to make it easier to parse them into the views
 */

class Language_model extends CI_Model {

    public function getResNavLanguage() {
        $this->lang->load('ResidentNav_lang', $this->session->language);
        return array(
            'font_size' => lang('res_navbar_font_size'),
            'greater' => lang('res_navbar_bigger_font'),
            'smaller' => lang('res_navbar_smaller_font'),
            'choose_topic' => lang('choose_topic'),
            'welcome' => lang('welcome')
        );
    }

    public function getResQuestionLanguage() {
        $this->lang->load('ResidentQuestion_lang', $this->session->language);
        return array(
            "verybad" => lang('verybad'),
            "bad" => lang('bad'),
            "ok" => lang('ok'),
            "good" => lang('good'),
            "verygood" => lang('verygood'),
            "skipquestion" => lang('skipquestion')
        );
    }

    public function getResQuestionEndLanguage() {
        $this->lang->load('ResidentQuestionEndpage_lang', $this->session->language);
        return array(
            'yes' => lang('res_question_end_yes'),
            'no' => lang('res_question_end_no'),
            'content' => lang('res_question_end_content')
        );
    }

    public function getCareLoginLanguage() {
        $this->lang->load('CaregiverLogin_lang', $this->session->language);
        return array(
            'login' => lang('login'),
            'username' => lang('username'),
            'password' => lang('password'),
            'goto_resident' => lang('goto_resident')
        );
    }

    public function getResidentLoginLanguage() {
        $this->lang->load('ResidentLogin_lang', $this->session->language);
        return array(
            'title' => lang('ResidentLogin_Title'),
            'goto_caregiver' => lang('ResidentLogin_gotoCaregiver')
        );
    }

    public function getAddResidentLanguage() {
        $this->lang->load('AddResident_lang', $this->session->language);
        return array(
            "uploadPhoto" => lang('addRes_uploadPhoto'),
            "firstName" => lang('addRes_firstName'),
            "lastName" => lang("addRes_lastName"),
            "birthDate" => lang("addRes_birthDate"),
            "sector" => lang("addRes_sector"),
            "room" => lang("addRes_room"),
            "gender" => lang("addRes_gender"),
            "male" => lang("addRes_male"),
            "female" => lang("addRes_female"),
            "married" => lang("addRes_married"),
            "children" => lang("addRes_children"),
            "yes" => lang("addRes_yes"),
            "no" => lang("addRes_no"),
            "submit" => lang("addRes_submit"),
            "cancel" => lang("addRes_cancel")
        );
    }

    public function getCaregiverInfoLanguage() {
        $this->lang->load('CaregiverInfo_lang', $this->session->language);
        return array(
            "fN" => lang("CareInfo_firstName"),
            "lN" => lang("CareInfo_lastName"),
            "mail" => lang("CareInfo_email"),
            "language" => lang("CareInfo_language"),
            "ndl" => lang("CareInfo_dutch"),
            "eng" => lang("CareInfo_english"),
            "submit" => lang("CareInfo_submit"),
            "cancel" => lang("CareInfo_cancel"),
            "changePassword" => lang("CareInfo_changePassword"),
            "close" => lang("CareInfo_sluiten"),
            "oldPassword" => lang("CareInfo_oldPassword"),
            "newPassword" => lang("CareInfo_newPassword"),
            "confirmPassword" => lang("CareInfo_confirmPassword"),
            "passwords_dont_match" => lang("CareInfo_passwordsDontMatch"),
            "password_alert_success" => lang("CareInfo_passwordAlertSuccess"),
            "password_alert_fail" => lang("CareInfo_passwordAlertFail")
        );
    }

    public function getIndivResLanguage() {
        $this->lang->load('IndivResident_lang', $this->session->language);
        return array(
            "room" => lang("IndivRes_room"),
            "sectorString" => lang("IndivRes_sector"),
            "languageString" => lang("IndivRes_language"),
            "birthDate" => lang("IndivRes_birthDate"),
            "genderString" => lang("IndivRes_gender"),
            "marriedString" => lang("IndivRes_married"),
            "childrenString" => lang("IndivRes_children"),
            "notesString" => lang("IndivRes_notes"),
            "addNote" => lang("IndivRes_addNote"),
            "writeNote" => lang("IndivRes_writeNote"),
            "submit" => lang("IndivRes_submit"),
            "close" => lang("IndivRes_close"),
            "scores" => lang("IndivRes_scores"),
            "issues" => lang("IndivRes_issues"),
            "shortTerm" => lang("IndivRes_shortTerm"),
            "longTerm" => lang("IndivRes_longTerm"),
            "changeSector" => lang("IndivRes_changeSector"),
            "roomNumber" => lang("IndivRes_changeRoom"),
            "getQR" => lang("IndivRes_getQRCodes"),
            "changeInfo" => lang("IndivRes_changeInfo")
        );
    }

    public function getSectorOverviewLanguage() {
        $this->lang->load('SectorOverview_lang', $this->session->language);
        return array(
            "addSector" => lang("SectorOverview_addSector"),
            "residentsString" => lang("SectorOverview_residents"),
            "chooseSector" => lang("SectorOverview_chooseSector"),
            "seeResidents" => lang("SectorOverview_seeResidents")
        );
    }

    public function getSettingsLanguage() {
        $this->lang->load('Settings_lang', $this->session->language);
        return array(
            "personal" => lang("Settings_personal"),
            "settings" => lang("Settings_settings"),
            "questionnaire1" => lang("Settings_questionnaire1"),
            "questionnaire2" => lang("Settings_questionnaire2"),
            "groups1" => lang("Settings_groups1"),
            "groups2" => lang("Settings_groups2")
        );
    }

    public function getStatisticsLanguage() {
        $this->lang->load('Statistics_lang', $this->session->language);
        return array(
            "chooseSectors" => lang("stats_chooseSectors"),
            "allSectors" => lang('stats_allSectors'),
            "strongly_disagree" => lang('stats_stronglyDisagree'),
            "disagree" => lang('stats_disagree'),
            "neutral" => lang('stats_neutral'),
            "agree" => lang('stats_agree'),
            "strongly_agree" => lang('stats_stronglyAgree'),
            "y_label" => lang('stats_chartY'),
            "x_label" => lang('stats_chartX'),
            "chart_title" => lang('stats_chartTitle'),
            "show_chart_header" => lang('stats_showChart'),
            "average_header" => lang('stats_average'),
            "no_data_msg" => lang('stats_noData'),
            "no_answer" => lang('stats_noAnswer'),
            "from" => lang('stats_from'),
            "till" => lang('stats_till'),
            "chooseDate" => lang('stats_chooseDate'),
            "dateError" => lang('stats_dateError')
        );
    }

    public function getDashboardLanguage() {
        $this->lang->load('Dashboard_lang', $this->session->language);
        return array(
            "avgActivity" => lang("dashboard_avgActivity"),
            "avgScore" => lang("dashboard_avgScore"),
            "selectAll" => lang("dashboard_selectAll"),
            "delete" =>lang("dashboard_delete"),
            "confirm" =>lang("dashboard_confirm"),
            "lowscore"=>lang("dashboard_lowscore"),
            "activity"=>lang("dashboard_activity"),
            "nrresidents"=>lang("dashboard_nrresidents"),
            "filternotification"=>lang("dashboard_filternotification"),
            "filteractivity"=>lang("dashboard_filteractivity")
        );
    }
    
    public function getResidentMenuLanguage()
    {
        $this->lang->load('ResidentMenu_lang',$this->session->language);
        return array(
            "font_size"=> lang("residentMenu_fontSize"),
            "greater"=> lang("residentMenu_greater"),
            "smaller"=> lang("residentMenu_smaller"),
            "sentence1"=> lang("residentMenu_sentence1"),
            "messagesAvailable"=> lang("residentMenu_messagesAvailable"),
            "noMessages" => lang("residentMenu_noMessages"),
            "sentence3"=> lang("residentMenu_moreQuestions"),
            "sentence4"=> lang("residentMenu_logout")
        );     
    }
    
        public function getResOverviewLanguage()
    {
        $this->lang->load('ResidentOverview_lang',$this->session->language);
        return array(
            "title"=> lang("resOverview_title"),
            "search"=> lang("resOverview_search"),
            "room"=> lang("resOverview_room"),
            "add"=> lang("resOverview_add"),
        );     
    }
    
   

    public function getUploadLanguage() {
        $this->lang->load('Upload_lang', $this->session->language);
        return array(
            "success" => lang("upload_success"),
        );
    }

    public function getSendMessageLanguage() {
        $this->lang->load('sendMessage_lang', $this->session->language);
        return array(
            "welcome" => lang("sendMessage_welcome"),
            "changeImage" => lang("sendMessage_changeImage"),
            "selectReceivers" => lang("sendMessage_selectReceivers"),
            "searchboxPlaceholder" => lang("sendMessage_searchboxPlaceholder"),
            "makeMessage" => lang("sendMessage_makeMessage"),
            "addImage" => lang("sendMessage_addImage"),
            "maxChar" => lang("sendMessage_maxChar"),
            "messagePlaceholder" => lang("sendMessage_messagePlaceholder"),
            "sendMessage" => lang("sendMessage_sendMessage"),
            "FirstName or LastName" =>lang("sendMessage_forl")
        );
    }

    public function SetSessionLanguage() {
        if ($this->session->language == 'dutch') {
            $this->session->set_userdata('questionLang', 'qDutch');
            $this->session->set_userdata('topicLang', 'topicDutch');
        } else if ($this->session->language == 'english') {
            $this->session->set_userdata('questionLang', 'qEnglish');
            $this->session->set_userdata('topicLang', 'topicEnglish');
        }
        return;
    }

}
