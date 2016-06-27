<?php
/**
 * BlockSettingBehavior::getBlockSetting()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Mitsuru Mutaguchi <mutaguchi@opensource-workshop.jp>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsModelTestCase', 'NetCommons.TestSuite');

/**
 * BlockSettingBehavior::getBlockSetting()のテスト
 *
 * @author Mitsuru Mutaguchi <mutaguchi@opensource-workshop.jp>
 * @package NetCommons\Blocks\Test\Case\Model\Behavior\BlockSettingBehavior
 */
class BlockSettingBehaviorGetBlockSettingTest extends NetCommonsModelTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.blocks.block_setting',
	);

/**
 * Plugin name
 *
 * @var string
 */
	public $plugin = 'blocks';

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		//テストプラグインのロード
		NetCommonsCakeTestCase::loadTestPlugin($this, 'Blocks', 'TestBlocks');
		$this->TestModel = ClassRegistry::init('TestBlocks.TestBlockSettingBehaviorModel');
	}

	///**
	// * getBlockSetting()テストのDataProvider
	// *
	// * ### 戻り値
	// *  - roomId ルームID
	// *  - blockKey ブロックキー
	// *
	// * @return array データ
	// */
	//	public function dataProvider() {
	//		$result[0] = array();
	//		$result[0]['roomId'] = null;
	//		$result[0]['blockKey'] = null;
	//
	//		return $result;
	//	}
	//* @param int $roomId ルームID
	//* @param string $blockKey ブロックキー
	//* @dataProvider dataProvider

/**
 * getBlockSetting()のテスト
 *
 * @return void
 */
	public function testGetBlockSetting() {
		$isRow = 0;
		$roomId = 1;
		$blockKey = 'block_1';
		Current::write('Plugin.key', 'dummy');

		//テスト実施
		$result = $this->TestModel->getBlockSetting($isRow, $roomId, $blockKey);

		//チェック
		//debug($result);
		// データあり
		$this->assertArrayHasKey('use_like', $result['BlockSetting']);
	}

/**
 * getBlockSetting()のテスト 横持ち
 *
 * @return void
 */
	public function testGetBlockSettingRow() {
		$isRow = 1;
		$roomId = 1;
		$blockKey = 'block_1';
		Current::write('Plugin.key', 'dummy');

		//テスト実施
		$result = $this->TestModel->getBlockSetting($isRow, $roomId, $blockKey);

		//チェック
		//debug($result);
		// データあり
		$this->assertArrayHasKey('use_like', $result['BlockSetting']);
	}

	///**
	// * getBlockSetting()のテスト - 空
	// *
	// * @return void
	// */
	//	public function testGetBlockSettingEmpty() {
	//		$isRow = 1;
	//		$roomId = 1;
	//		$blockKey = 'block_999';	// データがないブロックID
	//		Current::write('Plugin.key', 'dummy');
	//
	//		//テスト実施
	//		$result = $this->TestModel->getBlockSetting($isRow, $roomId, $blockKey);
	//
	//		//チェック
	//		debug($result);
	//		// データあり
	//		//$this->assertEmpty($result);
	//	}

}
