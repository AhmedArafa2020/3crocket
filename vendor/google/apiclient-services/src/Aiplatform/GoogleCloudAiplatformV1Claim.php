<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Aiplatform;

class GoogleCloudAiplatformV1Claim extends \Google\Collection
{
  protected $collection_key = 'factIndexes';
  /**
   * @var int
   */
  public $endIndex;
  /**
   * @var int[]
   */
  public $factIndexes;
  /**
   * @var float
   */
  public $score;
  /**
   * @var int
   */
  public $startIndex;

  /**
   * @param int
   */
  public function setEndIndex($endIndex)
  {
    $this->endIndex = $endIndex;
  }
  /**
   * @return int
   */
  public function getEndIndex()
  {
    return $this->endIndex;
  }
  /**
   * @param int[]
   */
  public function setFactIndexes($factIndexes)
  {
    $this->factIndexes = $factIndexes;
  }
  /**
   * @return int[]
   */
  public function getFactIndexes()
  {
    return $this->factIndexes;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param int
   */
  public function setStartIndex($startIndex)
  {
    $this->startIndex = $startIndex;
  }
  /**
   * @return int
   */
  public function getStartIndex()
  {
    return $this->startIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAiplatformV1Claim::class, 'Google_Service_Aiplatform_GoogleCloudAiplatformV1Claim');
