<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function creating(Reply $reply)
    {
        $reply->content = clean($reply->content, 'user_topic_body');
    }

    public function created(Reply $reply)
    {
        $reply->topic->updateReplyCount();

        $topic = $reply->topic;
        // 通知话题作者有新的评论
        // 如果评论的作者不是话题的作者，才需要通知
        if ( ! $reply->user->isAuthOf($topic)) {
            $topic->user->notify(new TopicReplied($reply));
        }
    }

    public function deleted(Reply $reply)
    {
        $reply->topic->updateReplyCount();
    }
}
