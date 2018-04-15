<?php

namespace frontend\models;

use Yii;
use cornernote\linkall\LinkAllBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "history".
 *
 * @property integer                                                                                                                      $id
 * @property integer                                                                                                                      $patient
 * @property string                                                                                                                       $medicalcard_number
 * @property string                                                                                                                       $receiptdate
 * @property integer                                                                                                                      $chamber
 * @property integer                                                                                                                      $hospitalisation
 * @property integer                                                                                                                      $diagnosis_main
 * @property string                                                                                                                       $complications
 * @property integer                                                                                                                      $doctor
 * @property string                 $complains
 * @property string                 $medical_history
 * @property integer                $postponed_disease
 * @property integer                $smoke
 * @property integer                $alcohol
 * @property string                 $addict
 * @property string                 $gynecological_history
 * @property string                 $allergy
 * @property string                 $primary_inspection_commnet
 * @property integer                $state
 * @property integer                $position
 * @property integer                $diet
 * @property double                 $temperature
 * @property string                 $edema
 * @property string                 $lymphonodus
 * @property string                 $musculoskeletal
 * @property string                 $nose_breath
 * @property integer                $breath
 * @property string                 $percussion
 * @property integer                $wheeze
 * @property integer                $heartones
 * @property string                 $pressure
 * @property integer                $pulse
 * @property integer                $pulsetype
 * @property integer                $toungue
 * @property integer                $yawn
 * @property integer                $stomach
 * @property integer                $stomach_tension
 * @property integer                $peritoneum_irritation
 * @property integer                $intestine_palpation
 * @property integer                $excretion_type
 * @property integer                $feces_color
 * @property integer                $feces_blood
 * @property integer                $liver_papation
 * @property integer                $liver_edge
 * @property integer                $spleen
 * @property integer                $loin
 * @property integer                $kidneys
 * @property integer                $kindeney_area
 * @property integer $pasternatskiy
 * @property integer                                                                                                                      $pissing
 * @property integer                                                                                                                      $urinestream
 * @property integer                                                                                                                      $urinary_bladder
 * @property integer                                                                                                                      $rectum
 * @property string                                                                                                                       $local_status
 * @property integer                                                                                                                      $diagnosis_preliminary
 * @property integer                                                                                                                      $diagnosis_clinical
 * @property integer                                                                                                                      $gallbladder
 * @property string                                                                                                                       $extractdate
 *
 * @property ConcomitantDiagnosis[]                                                                                                       $diagnosis_concomitant
 * @property BaseUrinestream                                                                                                              $urinestream0
 * @property BaseUrinaryBladder                                                                                                           $urinaryBladder
 * @property DiagnosisPreliminary                                                                                                         $diagnosisPreliminary
 * @property Heartscopes[]                                                                                                                $heartscopes
 * @property Hearttones[]                                                                                                                 $heartones0
 * @property Tongue[]                                                                                                                     $toungue0
 * @property StomachTension                                                                                                               $stomachTension
 * @property BaseIntestinePalpation                                                                                                       $intestinePalpation
 * @property LiverPapation                                                                                                                $liverPapation
 * @property Gallbladder                                                                                                                  $gallbladder0
 * @property BaseKidneys                                                                                                                  $kidneys0
 */
class History extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */

	public $postponed_disease_ids=[];

	public static function tableName()
	{
		return 'history';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[
						[
								'patient',
								'medicalcard_number',
								'receiptdate',
								'diagnosis_main',
								'doctor',
								'medical_history',
								'state',
								'position',
								'diet',
								'temperature',
								'edema',
								'breath',
								'heartscopes',
								'heartones',
								'pulse',
								'pulsetype',
								'toungue',
								'yawn',
								'stomach',
								'peritoneum_irritation',
								'excretion_type',
								'feces_color',
								'feces_blood',
								'liver_papation',
								'liver_edge',
								'spleen',
								'loin',
								'kidneys',
								'kindeney_area',
								'pissing',
								'urinestream',
								'rectum',
								'diagnosis_preliminary',
								'diagnosis_clinical',
								'gallbladder'
						],
						'required'
				],
				[
						[/*	'patient',
								'chamber',
								'hospitalisation',
								'alcohol',
								'diagnosis_main',
								'doctor',
								'postponed_disease',
								'smoke',
								'state',
								'position',
								'diet',
								'breath',
								'wheeze',
								'heartones',
								'pulse',
								'pulsetype',
								'toungue',
								'yawn',
								'stomach',
								'stomach_tension',
								'peritoneum_irritation',
								'intestine_palpation',
								'excretion_type',
								'feces_color',
								'feces_blood',
								'liver_papation',
								'liver_edge',
								'spleen',
								'loin',
								'kidneys',
								'kindeney_area',
								'pasternatskiy',
								'pissing',
								'urinestream',
								'urinary_bladder',
								'rectum',
								'diagnosis_preliminary',
								'diagnosis_clinical',
								'gallbladder'*/
						],
						'integer'
				],
				[['receiptdate', 'extractdate'], 'safe'],
				[['temperature'], 'number'],
				[['medicalcard_number'], 'string', 'max'=>50],
				[['complications', 'complains', 'gynecological_history', 'edema'], 'string', 'max'=>500],
				[['medical_history', 'local_status'], 'string', 'max'=>1000],
				[['allergy', 'lymphonodus', 'nose_breath', 'percussion'], 'string', 'max'=>250],
				[['pressure'], 'string', 'max'=>200],
				/*		[
								['heartscopes', 'heartones'],
								'unique',
								'targetAttribute'=>['heartscopes', 'heartones'],
								'message'        =>'The combination of Heartscopes and Heartones has already been taken.'
						],
						[
								['diagnosis_concomitant'],
								'exist',
								'skipOnError'    =>true,
								'targetClass'    =>ConcomitantDiagnosis::className(),
								'targetAttribute'=>['diagnosis_concomitant'=>'concomitant_id']
						],
						[
								['urinestream'],
								'exist',
								'skipOnError'    =>true,
								'targetClass'    =>BaseUrinestream::className(),
								'targetAttribute'=>['urinestream'=>'id']
						],
						[
								['urinary_bladder'],
								'exist',
								'skipOnError'    =>true,
								'targetClass'    =>BaseUrinaryBladder::className(),
								'targetAttribute'=>['urinary_bladder'=>'id']
						],
						[
								['diagnosis_preliminary'],
								'exist',
								'skipOnError'    =>true,
								'targetClass'    =>DiagnosisPreliminary::className(),
								'targetAttribute'=>['diagnosis_preliminary'=>'diagnosis_preliminary_id']
						],
						[
								['heartscopes'],
								'exist',
								'skipOnError'    =>true,
								'targetClass'    =>Heartscopes::className(),
								'targetAttribute'=>['heartscopes'=>'heartscope_id']
						],
						[
								['heartones'],
								'exist',
								'skipOnError'    =>true,
								'targetClass'    =>Hearttones::className(),
								'targetAttribute'=>['heartones'=>'heartone_id']
						],
						[
								['toungue'],
								'exist',
								'skipOnError'    =>true,
								'targetClass'    =>Tongue::className(),
								'targetAttribute'=>['toungue'=>'tongue_id']
						],
						[
								['stomach_tension'],
								'exist',
								'skipOnError'    =>true,
								'targetClass'    =>StomachTension::className(),
								'targetAttribute'=>['stomach_tension'=>'stomach_tension_id']
						],
						[
								['intestine_palpation'],
								'exist',
								'skipOnError'    =>true,
								'targetClass'    =>BaseIntestinePalpation::className(),
								'targetAttribute'=>['intestine_palpation'=>'id']
						],
						[
								['liver_papation'],
								'exist',
								'skipOnError'    =>true,
								'targetClass'    =>LiverPapation::className(),
								'targetAttribute'=>['liver_papation'=>'liver_papation_id']
						],
						[
								['gallbladder'],
								'exist',
								'skipOnError'    =>true,
								'targetClass'    =>Gallbladder::className(),
								'targetAttribute'=>['gallbladder'=>'gallbladder_id']
						],
						[
								['kidneys'],
								'exist',
								'skipOnError'    =>true,
								'targetClass'    =>BaseKidneys::className(),
								'targetAttribute'=>['kidneys'=>'id']
						],*/
		];
	}


	public function behaviors()
	{
		return [
				LinkAllBehavior::className(),
		];
	}


	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'id'                        =>'ID',
				'patient'                   =>'Пациент',
				'medicalcard_number'        =>'Номер карты',
				'receiptdate'               =>'Дата поступления',
				'chamber'                   =>'Палата',
				'hospitalisation'           =>'Госпитализация',
				'diagnosis_main'            =>'Диагноз основной',
				'diagnosis_concomitant'     =>'Диагноз сопутсвующий',
				'complications'             =>'Осложнения',
				'doctor'                    =>'Врач',
				'complains'                 =>'Жалобы',
				'medical_history'           =>'История настоящего заолевания',
				'postponed_disease'         =>'Перенесенные заболевания',
				'smoke'                     =>'Курение',
				'alcohol'                   =>'Алкоголь',
				'addict'                    =>'Употребляет',
				'gynecological_history'     =>'Гинекологический анамнез',
				'allergy'                   =>'Аллергические проявления в прошлом',
				'primary_inspection_commnet'=>'Дополнительные сведения',
				'state'                     =>'Состояние',
				'position'                  =>'Положение',
				'diet'                      =>'Состояние питания',
				'temperature'               =>'Температура тела',
				'edema'                     =>'Пастозность, отеки',
				'lymphonodus'               =>'Лифоузлы',
				'musculoskeletal'           =>'Костно-мышечная система',
				'nose_breath'               =>'Дыхание через нос',
				'breath'                    =>'Дыхание',
				'percussion'                =>'Перкуторно',
				'wheeze'                    =>'Хрипы',
				'heartscopes'               =>'Границы сердца',
				'heartones'                 =>'Тоны',
				'pressure'                  =>'АД',
				'pulse'                     =>'Пульс',
				'pulsetype'                 =>'Тип пульса',
				'toungue'                   =>'Язык',
				'yawn'                      =>'Зев',
				'stomach'                   =>'Живот',
				'stomach_tension'           =>'Напряжение мышц живота',
				'peritoneum_irritation'     =>'Симтом раздраженой брюшины',
				'intestine_palpation'       =>'Кишечник, пальпация',
				'excretion_type'            =>'Стул',
				'feces_color'               =>'Стул цвет',
				'feces_blood'               =>'Стул кровь',
				'liver_papation'            =>'Печень',
				'liver_edge'                =>'Печень край',
				'gallbladder'               =>'Желчный пузырь',
				'spleen'                    =>'Селезенка',
				'loin'                      =>'Поясничная область',
				'kidneys'                   =>'Почки',
				'kindeney_area'             =>'Области почки',
				'pasternatskiy'             =>'Симптом Пастернацкого',
				'pissing'                   =>'Мочеиспускание',
				'urinestream'               =>'Струя мочи',
				'urinary_bladder'           =>'Мочевой пузырь',
				'rectum'                    =>'Исследования через прямую кишку',
				'local_status'              =>'Локальный статус',
				'diagnosis_preliminary'     =>'Диагноз предварительный',
				'diagnosis_clinical'        =>'Диагноз клинический',
				'extractdate'               =>'Extractdate',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getDiagnosisConcomitant()
	{
		return $this->hasMany(ConcomitantDiagnosis::className(), ['diagnosis_concomitant'=>'concomitant_id'])->viaTable('concomitant_diagnosis', [
				'diagnosis_base_id',
				'concomitant_id'
		]);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUrinestream()
	{
		return $this->hasOne(BaseUrinestream::className(), ['id'=>'urinestream']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUrinaryBladder()
	{
		return $this->hasOne(BaseUrinaryBladder::className(), ['id'=>'urinary_bladder']);
	}


	public function getPostponedDisease()
	{
		return $this->hasMany(PostponedDisease::className(), ['postponed_disease'=>'postponed_disease_id'])->viaTable('postponed_disease', [
				'diagnosis_base_id',
				'postponed_disease_id'
		]);
	}


	public function getDropPostponedDisease()
	{
		$data=BaseDiagnosis::find()->asArray()->all();

		return ArrayHelper::map($data, 'id', 'name');
	}


	public function PostponedDiseaseIds()
	{
		$this->postponed_disease_ids=\yii\helpers\ArrayHelper::getColumn($this->getDropPostponedDisease()->asArray()->all(), 'postponed_disease_id');

		return $this->postponed_disease_ids;
	}


	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getDiagnosisPreliminary()
	{
		return $this->hasOne(DiagnosisPreliminary::className(), ['diagnosis_preliminary_id'=>'diagnosis_preliminary']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getHeartscopes()
	{
		return $this->hasMany(BaseHeartscopes::className(), ['id'=>'heartscopes_base_id'])->viaTable('heartscopes', [
				'heartscope_id',
				'id'
		]);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getHeartones()
	{
		return $this->hasMany(Hearttones::className(), ['heartone_id'=>'heartones'])->viaTable('hearttones', [
				'hearttone_base_id',
				'heartone_id'
		]);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getToungue()
	{
		return $this->hasMany(Tongue::className(), ['tongue_id'=>'toungue'])->viaTable('tongue', [
				'tongue_base_id',
				'tongue_id'
		]);
	}


	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getStomach()
	{
		return $this->hasMany(Stomach::className(), ['stomach_base_id'=>'stomach'])->viaTable('stomach', [
				'stomach_base_id',
				'stomach_id'
		]);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getStomachTension()
	{
		return $this->hasOne(StomachTension::className(), ['stomach_tension_id'=>'stomach_tension']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getIntestinePalpation()
	{
		return $this->hasOne(BaseIntestinePalpation::className(), ['id'=>'intestine_palpation']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getLiverPapation()
	{
		return $this->hasMany(LiverPapation::className(), ['liver_papation_id'=>'liver_papation'])->viaTable('liver_papation', [
				'liver_papation_base_id',
				'liver_papation_id'
		]);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getGallbladder()
	{
		return $this->hasMany(Gallbladder::className(), ['gallbladder_id'=>'gallbladder'])->viaTable('gallbladder', [
				'gallbladder_base_id',
				'gallbladder_id'
		]);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getkindeneyArea()
	{
		return $this->hasMany(Kidneyarea::className(), ['kidneys_area_id'=>'kindeney_area'])->viaTable('kidneyarea', [
				'kidneyarea_base_id',
				'kidneys_area_id'
		]);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRectum()
	{
		return $this->hasMany(Rectum::className(), ['rectum_id'=>'rectum'])->viaTable('rectum', [
				'rectum_base_id',
				'rectum_id'
		]);
	}

	public function afterSave($insert, $changedAttributes)
	{
		$heartcopes=[];
		foreach($this->heartscopes as $heartscope_id){
			$heartscope=BaseHeartscopes::getHearcopeById($heartscope_id);
			if($heartscope){
				$heartcopes[]=$heartscope;
			}
		}
		$this->linkAll('heartscopes', $heartcopes);


		parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
	}

}
