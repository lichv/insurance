<?php

/*
 * This file is part of the overtrue/socialite.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Insurance\Provider;

use Insurance\Provider\ProviderInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class QQProvider.
 *
 * 
 */
class SunshineProvider extends AbstractProvider implements ProviderInterface{
	protected $header;

	public function setHeader($header){
		$this->header['sysFlag'] = $header['sysFlag'];
		$this->header['sendName'] = $header['sendName'];
		$this->header['sendPwd'] = $header['sendPwd'];
		$this->header['sendSeq'] = $header['sendSeq'];
		$this->header['sendTime'] = date('Y-m-d H:i:s');
		$this->header['policyCount'] = $header['policyCount'];
		$this->header['transCode'] = $header['transCode'];
		$this->header['modeFlag'] = $header['modeFlag'];
		return $this;
	}

	public function send(Request $request){
		$input = $request->all();
		$header = ['operateType'=>'INPUT'];
		$data = array_merge($this->header,$header[
			'tbInsuranceSchema'=>[
				'proposalNo'=> '',
				'printNo'=> '',
				'importSN'=> '',
				'payId'=> '',
				'certifyCode'=> '',
				'insurDate'=> '2016-06-06 09: 46: 08',
				'insurStartDate'=> '2016-06-06 09: 46: 08',
				'insurEndDate'=> '2017-06-06 09: 46: 08',
				'insurPeriod'=> '1',
				'insuYearFlag'=> 'D',
				'mult'=> '3',
				'premium'=> '',
				'amount'=> '',
				'polFlag'=> '0',
				'cardType'=> '1',
				'saleChnl'=> '08',
				'benefMode'=> '1',
				'custNumber'=> '1',
				'makeDate'=> '2016-06-06 09: 45: 08',
				'isLife'=> 'P',
				'exportFlag'=> '0',
				'policyState'=> '0',
				'transFlag'=> '2',
				'transMode'=> '3',
				'processState'=> '1',
				'payType'=> 'WEPAY',
				'isVisaUsed'=> 'N',
				'relationship'=> '2',
				'holderMobile'=> '',
				'holderAge'=> '28',
				'holderSex'=> '1',
				'holderName'=> '张小白',
				'holderidType'=> '1',
				'holderIdNo'=> '',
				'holderAddress'=> '广东-广州-花都区狮岭镇金狮一街26号三楼*',
				'holderphone'=> '',
				'holderemail'=> '',
				'insuredId'=> '012ewteqrtg3',
				'insuredName'=> '李德林',
				'insuredSex'=> '1',
				'insuredAge'=> '28',
				'insuredBirthday'=> '1977-12-02',
				'insuredIdNo'=> '',
				'insuredidType'=> '1',
				'insuredemail'=> '',
				'insuredmobile'=> '',
				'insuredNumber'=> '1',
				'operateType'=> 'INPUT',
				'isSettled'=> '1',
				'inputDate'=> '2016-06-06 08: 46:09',
				'status'=> '00',
				'isDIY'=> 'N',
				'groupRiskFlag'=> '1',
				'transMode'=> '2',
				'mainRiskCode'=> '2700',
				'appliType'=> '1',
				'transCode'=> '',
				'propertyZip'=> '',
				'propertyAddress'=> '',
				'propertyHouseStruc'=> ''
			],
			'tbCustList'=>[
				[
					'custId'=>'',
					'custName'=>'',
					'sex'=>'',
					'idNo'=>'',
					'idType'=>'',
					'relationship'=>'',
					'mobile'=>'',
					'email'=>'',
				]
			]
		]);
		$response = $this->getHttpClient()->post($this->getSendUrl(),[
			'form_params' => $data
		]);
		$result = $response->getBody()->getContents();
		return $result;
	}

	public function cancel(Request $request){
		$input = $request->all();
		$header = ['operateType'=>'WRITEOFF'];
		$data = array_merge($this->header,$header[
			'tBInsuranceSchemaList'=>[
				"policyNo"=>"SV1R2700201600125108",
				"polflag"=>"1",
				"status"=>"01",
				"endorDate"=>"2016-08-27 00:05:50"
			]
		]);
		$response = $this->getHttpClient()->post($this->getSendUrl(),[
			'form_params' => $data
		]);
		$result = $response->getBody()->getContents();
		return $result;
	}

	public function surrender(Request $reqeust){
		$input = $request->all();
		$header = ['operateType'=>'WITHDRAW'];
		$data = array_merge($this->header,$header[
			'tBInsuranceSchemaList'=>[
				"policyNo"=>"SV1R2700201600125108",
				"polflag"=>"1",
				"status"=>"01",
				"endorDate"=>"2016-08-27 00:05:50"
			]
		]);
		$response = $this->getHttpClient()->post($this->getSendUrl(),[
			'form_params' => $data
		]);
		$result = $response->getBody()->getContents();
		return $result;
	}
}
