<?php

namespace Jaysc\ReportApi\Api\Controller;

use XF\Mvc\ParameterBag;
use XF\Api\Controller\AbstractController;

/**
 * @api-group Reports
 */
class Reports extends AbstractController
{
	protected function preDispatchController($action, ParameterBag $params)
	{
		$this->assertApiScopeByRequestMethod('report');
	}

	public function actionGet()
	{
		$reportRepo = $this->getReportRepo();

		/** @var \XF\Mvc\Entity\AbstractCollection $reports */
		$reports = $reportRepo->findReports()->fetch();

		$result = [
			'reports'=>$reports->toApiResults()
		];

		return $this->apiResult($result);
	}

	/**
	 * @return \XF\Repository\Report
	 */
	protected function getReportRepo()
	{
		return $this->repository('XF:Report');
	}
}