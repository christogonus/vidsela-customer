<?php

namespace App\Models;

use App\Models\Scopes\CurrentTeamScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    protected $casts = [
        'show_attendees' => 'integer',
        'show_chat' => 'boolean',
        'allow_new_chats' => 'boolean',
        'save_new_chats' => 'boolean',
        'show_surveys' => 'boolean',
        'show_offer' => 'boolean',
        'status' => 'integer',
        'show_background_image' => 'boolean',
        'show_thumbnail' => 'boolean',
        'smart_autoplay' => 'boolean',
        'show_resume_thumbnail' => 'boolean',
        'show_logo_branding' => 'boolean',
        'auto_play' => 'boolean',
        'revisit_video_resume' => 'boolean',
    ];

    /**
     * Get the video's title.
     */
    protected function tags(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => explode(';', $value),
        );
    }

    /**
     * Get the video's title.
     */
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value),
        );
    }

    /**
     * Interact with the video's type.
     */
    protected function type(): Attribute
    {
        return Attribute::make(
            // get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }

    public function page() {
        return $this->hasOne(Page::class);
    }

    /**
     * Scope a query to only include current team.
     */
//    protected static function booted(): void
//    {
//        static::addGlobalScope(new CurrentTeamScope);
//    }

    /**
     * Scope a query to only include webinar videos.
     */
    public function scopeWebinar(Builder $query): void
    {
        $query->where('type', '=', 'webinar');
    }

    /**
     * Scope a query to only include vsl videos.
     */
    public function scopeVsl(Builder $query): void
    {
        $query->where('type', '=', 'vsl');
    }

    /**
     * Scope a query to only include draft videos.
     */
    public function scopeDraft(Builder $query): void
    {
        $query->where('status', '=', 0);
    }

    /**
     * Scope a query to only include published videos.
     */
    public function scopePublished(Builder $query): void
    {
        $query->where('status', '=', 1);
    }

    public function isPublished() {
        return $this->status === 1;
    }

    public function isVSL() {
        return $this->type === 'vsl';
    }

    public function isWebinar() {
        return $this->type === 'webinar';
    }

    public function activities() {
        return $this->hasMany(Activity::class);
    }

    public function toggleShowAttendees($value) {
        $this->show_attendees = $value;
        $this->save();
    }

    public function showChatOnWebinarVideo(bool $value) {
        $this->show_chat = $value;
        $this->save();
    }

    public function allowNewChatsOnWebinarVideo(bool $value) {
        $this->allow_new_chats = $value;
        $this->save();
    }

    public function saveNewChatsOnWebinarVideo(bool $value) {
        $this->save_new_chats = $value;
        $this->save();
    }

    public function showSurveysOnWebinarVideo(bool $value) {
        $this->show_surveys = $value;
        $this->save();
    }

    public function showOfferOnWebinarVideo(bool $value) {
        $this->show_offer = $value;
        $this->save();
    }

    public function showAlertsOnWebinarVideo(bool $value) {
        $this->show_alerts = $value;
        $this->save();
    }

    public function showQuizOnWebinarVideo(bool $value) {
        $this->show_quiz = $value;
        $this->save();
    }

    public function showPollsOnWebinarVideo(bool $value) {
        $this->show_polls = $value;
        $this->save();
    }

    public function setAspublished() {
        $this->status = 1;
        $this->save();
    }

    public function setAsDraft() {
        $this->status = 0;
        $this->save();
    }

    public function publicUrl() {
        return config('url.customer.endpoint') . '/' . $this->id;
    }


    public function source() {
        $getSource = parse_url($this->link);

        if (str_contains($getSource['host'], 'youtube.com') || str_contains($getSource['host'], "youtu.be")){
            return "youtube";
        }else if (str_contains($getSource['host'], 'vimeo.com')){
            return "vimeo";
        }else {
            return 'custom';
        }
    }


    public function timeToSeconds($time_in_hhmmss = "03:30:45") {
        $time_parts = explode(":", $time_in_hhmmss);
        $seconds = $time_parts[2] + $time_parts[1] * 60 + $time_parts[0] * 3600;
        return $seconds;
    }



}
