<?php

namespace Tests\Feature;

use App\Utils\Markdown;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestParseMarkdown extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testToc()
    {
        $text = "# 第一层标题
拉圣诞节福利卡姜是老的辣
阿克苏的离开房间爱了圣诞节了房间爱上了的房间爱上了的开发
## 第二层标题
拉斯卡的减肥啦开始就离开静安寺抵抗力福利卡说得对分

## 第二层标题
阿里速度快放假啦是进队列开发就是了肯德基

# 阿斯顿发送到离开房间爱上了的减肥

## 阿斯兰的会计法拉克是的减肥啦圣诞节福利

### 拉萨的积分离开静安寺抵抗力发上来看的积分";

        $md = new Markdown();
        $output = $md->text($text);
        dump($md->getToc());
        dump($output);

    }
}
