<?php

namespace Jaysc\ReportApi\XF\Entity;

class Report extends XFCP_Report
{
	protected function setupApiResultData(
		\XF\Api\Result\EntityResult $result, $verbosity = self::VERBOSITY_NORMAL, array $options = []
	)
    {
        $result->report_id = $this->report_id;
        $result->content_info = $this->content_info;
        $result->report_count = $this->report_count;
        $result->first_report_date = $this->first_report_date;
        $result->last_modified_date = $this->last_modified_date;

        return $result;
    }
}